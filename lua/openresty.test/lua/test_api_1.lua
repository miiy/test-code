local cjson = require("cjson")
local http = require("resty.http")
local redis  = require("resty.redis")

local appid = "wx15f6a39fa784b3a0"
local secret = "50718c0cc39ab5e0895a8dc2692f2c6c";

local red = redis:new()
red:set_timeout(1000)

local httpc = http:new()
local resp, err = httpc:request_uri("https://api.weixin.qq.com", {
    ssl_verify = false,
    method = "GET",
    path = "/cgi-bin/token?grant_type=client_credential&appid=" .. appid .. "&secret=" .. secret,
})

if not resp then 
    ngx.say("failed to request: ", err)
    return
end

ngx.status = resp.status

--获取响应头
for k, v in pairs(resp.headers) do
    if k ~= "Transfer-Encoding" and k ~= "Connection" then
        ngx.header[k] = v
    end
end

ngx.say(resp.body)
httpc:close()