local redis = require("resty.redis")

local _M = {}

local mt = {
    __index = _M
}

function _M:new()
    return setmetatable({}, mt)
end

function _M:connection(opts)
    local opts = opts or {}
    
    local red = redis:new()
    red:set_timeout(1000)
    local ok, err = red:connect("127.0.0.1", 6379)
    if not ok then
        ngx.say("connect to redis error: ", err)
        return red_close(red)
    end
end

local function _M:close()
    --释放连接（连接池实现）
    local pool_max_idle_time = 10000 --毫秒
    local pool_size = 100 --连接池大小
    local ok, err = self.redis:set_keepalive(pool_max_idle_time, pool_size)
    if not ok then
        ngx.say("close redis error: ", err)
    end
end

