/*
 * Copyright 2011 the original author or authors.
 *
 * Licensed under the Apache License, Version 2.0 (the "License");
 * you may not use this file except in compliance with the License.
 * You may obtain a copy of the License at
 *
 *      http://www.apache.org/licenses/LICENSE-2.0
 *
 * Unless required by applicable law or agreed to in writing, software
 * distributed under the License is distributed on an "AS IS" BASIS,
 * WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
 * See the License for the specific language governing permissions and
 * limitations under the License.
 */
package org.gradle.launcher.daemon.server.exec;

import org.gradle.api.logging.Logger;
import org.gradle.api.logging.Logging;
import org.gradle.internal.SystemProperties;
import org.gradle.internal.nativeintegration.ProcessEnvironment;
import org.gradle.launcher.daemon.protocol.Build;
import org.gradle.launcher.daemon.server.api.DaemonCommandExecution;
import org.gradle.util.GFileUtils;

import java.io.File;
import java.util.HashMap;
import java.util.Locale;
import java.util.Map;
import java.util.Properties;

/**
 * Aims to make the local environment the same as the client's environment.
 */
public class EstablishBuildEnvironment extends BuildCommandOnly {
    private final static Logger LOGGER = Logging.getLogger(EstablishBuildEnvironment.class);

    private final ProcessEnvironment processEnvironment;

    public EstablishBuildEnvironment(ProcessEnvironment processEnvironment) {
        this.processEnvironment = processEnvironment;
    }

    protected void doBuild(DaemonCommandExecution execution, Build build) {
        Properties originalSystemProperties = new Properties();
        originalSystemProperties.putAll(System.getProperties());
        Map<String, String> originalEnv = new HashMap<String, String>(System.getenv());
        File originalProcessDir = GFileUtils.canonicalise(new File("."));

        for (Map.Entry<String, String> entry : build.getParameters().getSystemProperties().entrySet()) {
            if (SystemProperties.getInstance().getStandardProperties().contains(entry.getKey())) {
                continue;
            }
            if (SystemProperties.getInstance().getNonStandardImportantProperties().contains(entry.getKey())) {
                continue;
            }
            if (entry.getKey().startsWith("sun.")) {
                continue;
            }
            System.setProperty(entry.getKey(), entry.getValue());
        }

        LOGGER.debug("Configuring env variables: {}", build.getParameters().getEnvVariables());
        processEnvironment.maybeSetEnvironment(build.getParameters().getEnvVariables());
        processEnvironment.maybeSetProcessDir(build.getParameters().getCurrentDir());

        // Capture and restore this in case the build code calls Locale.setDefault()
        Locale locale = Locale.getDefault();

        try {
            execution.proceed();
        } finally {
            System.setProperties(originalSystemProperties);
            processEnvironment.maybeSetEnvironment(originalEnv);
            processEnvironment.maybeSetProcessDir(originalProcessDir);
            Locale.setDefault(locale);
        }
    }
}
