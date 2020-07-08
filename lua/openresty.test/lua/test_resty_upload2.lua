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

function file_exists(path)
    local file = io.open(path, "rb")
    if file then file:close() end
    return file ~= nil
end

local function get_file_name(res)
    local file_name = ngx.re.match(res[2], '(.+)filename="(.+)"(.*)')
    if file_name then
        return file_name[2]
    end
end

local date = os.date("%Y/%m/%d", os.time())
local file_path = "/tmp" .. "/" .. date


while true do
    local typ, res, err = from:read()
    if not typ then
        ngx.say("failed to read: ", err)
        return
    end

    ngx.say("read: ", cjson.encode({typ, res}))

    if typ == "header" then
        local file_name = get_file_name(res)
        if file_name then
            
            if not file_exists(file_path) then
                os.execute("mkdir -p " .. file_path)
            end

            local file, err = io.open(file_path .. "/" .. file_name, "w+")
            if not file then
                ngx.say(err)
                ngx.say("failed to open file: ", file_name)
                return
            end
        end
    elseif typ == "body" then
        if file then
            file:write(res)
        end
    elseif typ == "part_end" then
        if file then
            file:close()
            file = nil
            ngx.say("file upload success")
        end
    elseif typ == "eof" then
        break
    else
    end
end
