<?php

/**
 * Simple hasPermission snippet
 * Usage:
 * [[!hasPermission?
 *  &permission=`some_permission`
 *  &allowString=`You have permission`
 *  &denyString=`You are denied access`
 * ]]
 * @param string $permission must be a Valid MODX permission, see:
 * @param string $or comma separated list of permissions
 * @param string $allowString can be any string or call to chunk ex: [[$myChunk]]
 * @param string $denyString can be any string or call to chunk ex: [[$myChunk]]
 */

$permission = $modx->getOption('perm', $scriptProperties, $modx->getOption('permission', $scriptProperties, 'load'));
$or = $modx->getOption('or', $scriptProperties, null);
$allowString = $modx->getOption('allowString', $scriptProperties, null);
$denyString = $modx->getOption('denyString', $scriptProperties, null);

$perms = array($permission => true);
$hasPermission = false;
if ( !empty($or)) {
    $tmp = explode(',', $or);
    foreach ($tmp as $p ) {
        if($modx->hasPermission(trim($p)) ) {
            $hasPermission = true;
            break;
        }
    }
} else {
    $modx->hasPermission($permission);
}

if ($hasPermission) {
    return $allowString;
} else {
    return $denyString;
}