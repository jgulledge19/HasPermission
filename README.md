# Simple hasPermission snippet for MODX Revolution

## Usage:
```
[[!hasPermission?
   &permission=`some_permission`
   &allowString=`You have permission`
   &denyString=`You are denied access`
]]
```
## Available Properties

 * @param string $permission must be a Valid MODX permission, see:
 * @param string $or comma separated list of permissions
 * @param string $allowString can be any string or call to chunk ex: [[$myChunk]]
 * @param string $denyString can be any string or call to chunk ex: [[$myChunk]]