CREATE TABLE
    IF NOT EXISTS `respuestas` (
        `id` INT NOT NULL AUTO_INCREMENT,
        `fecha` TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
        `periodoE` VARCHAR(255) NOT NULL,
        `nPregunta` INTEGER NOT NULL,
        `rPregunta` INTEGER NOT NULL,
        `objetivo` VARCHAR(255) NOT NULL,
        `meta` INTEGER NOT NULL,
        `rObjetivo` INTEGER NOT NULL,
        `pObjetivo` INTEGER NOT NULL, 
        `rEvaluacion` INTEGER NOT NULL, 
        PRIMARY KEY `pk_id`(`id`)
    )