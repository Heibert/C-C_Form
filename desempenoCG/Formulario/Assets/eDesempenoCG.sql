CREATE TABLE
    IF NOT EXISTS `eDesempenoCG` (
        `id` int(11) NOT NULL AUTO_INCREMENT,
        `id_evaluador` int(11) NOT NULL,
        `id_evaluado` int(11) NOT NULL,
        `fecha` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
        `campaña` VARCHAR(250) NOT NULL,
        `cargo` VARCHAR(250) NOT NULL,
        `promedio_1` varchar(25) COLLATE utf8mb4_unicode_ci NOT NULL,
        `promedio_2` varchar(25) COLLATE utf8mb4_unicode_ci NOT NULL,
        `promedio_3` varchar(25) COLLATE utf8mb4_unicode_ci NOT NULL,
        `promedio_4` varchar(25) COLLATE utf8mb4_unicode_ci NOT NULL,
        `promedio_5` varchar(25) COLLATE utf8mb4_unicode_ci NOT NULL,
        `promedio_6` varchar(25) COLLATE utf8mb4_unicode_ci NOT NULL,
        `promedio_7` varchar(25) COLLATE utf8mb4_unicode_ci NOT NULL,
        `promedio_8` varchar(25) COLLATE utf8mb4_unicode_ci NOT NULL,
        `promedioCriterios` varchar(25) COLLATE utf8mb4_unicode_ci NOT NULL,
        `objetivo_1` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
        `meta_1` int(11) NOT NULL,
        `rObjetivo_1` int(11) NOT NULL,
        `ponderacionObjetivo_1` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
        `objetivo_2` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
        `meta_2` int(11) NOT NULL,
        `rObjetivo_2` int(11) DEFAULT NULL,
        `ponderacionObjetivo_2` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
        `objetivo_3` mediumtext COLLATE utf8mb4_unicode_ci,
        `meta_3` int(11) DEFAULT NULL,
        `rObjetivo_3` int(11) DEFAULT NULL,
        `ponderacionObjetivo_3` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
        `objetivo_4` mediumtext COLLATE utf8mb4_unicode_ci,
        `meta_4` int(11) DEFAULT NULL,
        `rObjetivo_4` int(11) DEFAULT NULL,
        `ponderacionObjetivo_4` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
        `objetivo_5` mediumtext COLLATE utf8mb4_unicode_ci,
        `meta_5` int(11) DEFAULT NULL,
        `rObjetivo_5` int(11) DEFAULT NULL,
        `ponderacionObjetivo_5` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
        `objetivo_6` mediumtext COLLATE utf8mb4_unicode_ci,
        `meta_6` int(11) DEFAULT NULL,
        `rObjetivo_6` int(11) DEFAULT NULL,
        `ponderacionObjetivo_6` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
        `objetivo_7` mediumtext COLLATE utf8mb4_unicode_ci,
        `meta_7` int(11) DEFAULT NULL,
        `rObjetivo_7` int(11) DEFAULT NULL,
        `ponderacionObjetivo_7` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
        `objetivo_8` mediumtext COLLATE utf8mb4_unicode_ci,
        `meta_8` int(11) DEFAULT NULL,
        `rObjetivo_8` int(11) DEFAULT NULL,
        `ponderacionObjetivo_8` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
        `objetivo_9` mediumtext COLLATE utf8mb4_unicode_ci,
        `meta_9` int(11) DEFAULT NULL,
        `rObjetivo_9` int(11) DEFAULT NULL,
        `ponderacionObjetivo_9` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
        `objetivo_10` mediumtext COLLATE utf8mb4_unicode_ci,
        `meta_10` int(11) DEFAULT NULL,
        `rObjetivo_10` int(11) DEFAULT NULL,
        `ponderacionObjetivo_10` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
        `compromisos` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
        `desarrolloP` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
        `obsEvaluador` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
        `obsEvaluado` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
        `promedioObjetivos` varchar(25) COLLATE utf8mb4_unicode_ci NOT NULL,
        `pFinal` varchar(25) COLLATE utf8mb4_unicode_ci NOT NULL,
        PRIMARY KEY (`id`)
    ) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4 COLLATE = utf8mb4_unicode_ci AUTO_INCREMENT = 2;