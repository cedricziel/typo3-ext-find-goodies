<?php

if (TYPO3_MODE === 'BE') {
    $GLOBALS['TYPO3_CONF_VARS']['SC_OPTIONS']['extbase']['commandControllers'][$_EXTKEY] =
        \CedricZiel\FindGoodies\Command\IndexTtContentCommandController::class;
}
