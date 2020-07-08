#!/usr/local/lua/bin/lua

Account = {balance = 0}
function Account:new(conf)
    local conf = conf or {}
    setmetatable (conf, self)
    self.__index = self
    return conf
end

local obj = Account:new()
print(obj.balance)

Account, obj = nil, nil

--

Account = {balance = 0}
Account.__index = Account
function Account:new(conf)
    local conf = conf or {}
    setmetatable (conf, self)
    return conf
end

local obj = Account:new()
print(obj.balance)

Account, obj = nil, nil

--

Account = {balance = 0}
local mt = {__index = Account}
function Account:new(conf)
    local conf = conf or {}
    setmetatable(conf, mt)
    return conf
end

local obj = Account:new()
print(obj.balance)

Account, obj = nil, nil

--

--[[
local Person = {}
function Person:new(heart, body)
    local instance = {}
    instance.heart = heart
    instance.body = body
    instance.app = nil
    instance.v = 1
    setmetatable(instance, {
        __index = self,
        __call = self.v
    })
    return instance
end

function Person:eat()
    print("eat")
end

function Person:app()
    print("app")
    return "app"
end

local heart = function()
    print("pong")
    return "pong"
end

local body = function()
    print("run")
    return "run"
end


local obj = Person:new(heart, body)
obj.abc = 2
obj.eat()
Person()
--]]


-- __call()
local table = {}
local metatable = {}
function metatable.__call()
    print("Table called!")
end
setmetatable(table, metatable)
table()
--
local table = {}
function table:new()
    setmetatable(table, {
        __index = self
    })
end
function table:call()
    print("Table called!")
end
local tb = table:new()
tb
--

local table = { a=1 }
function table:new()
    setmetatable(table, {
        __index = self,
        __call = self.add2
    })
    return self
end


function table:add()
    print("add")
end

function table:add2()
    print("call")
end

local l = table:new()
local s = l:add()
print(s)

table()