local cjson = require("cjson")
local upload = require("resty.upload")

local chunk_size = 4096  -- should be set to 4096 or 8192
                         -- for real-world settings

local from, err = upload:new(chunk_size)
if not from then
    ngx.log(ngx.ERR, "failed to new upload: ", err)
    ngx.exit(500)
end

from:set_timeout(1000)

while true do
    local typ, res, err = from:read()
    if not typ then
        ngx.say("failed to read: ", err)
        return
    end

    ngx.say("read: ", cjson.encode({typ, res}))

    if typ == "eof" then
        break
    end
end

local typ, res, err = from:read()
ngx.say("read: ", cjson.encode({typ, res}))