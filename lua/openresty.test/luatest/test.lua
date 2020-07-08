#!/usr/local/lua/bin/lua
--[[
Account = {balance = 0}
function Account:new(o)
    o = o or {}
    self.__index = self
    setmetatable(o, self)
    return o
end

function Account:deposit(v)
    self.balance = self.balance + v
end

function Account:withdraw(v)
    self.balance = self.balance - v
end

account1 = Account:new()
print(account1.balance)
print(Account.balance)

account1:deposit(500.00)
print(account1.balance)
print(Account.balance)


Account = {balance = 0}
function Account:new(o)
    o = o or {}
    setmetatable(o, self)
    self.__index = self
    return o
end

function Account:deposit(v)
    self.balance = self.balance + v
end

function Account:withdraw(v)
    if v > self.balance then
        error "insufficient funds"
    end
    self.balance = self.balance - v
end

CreditAccount = Account:new({limit = 1000.00})

function CreditAccount:withdraw(v)
    if v - self.balance >= self:getLimit() then
        error "insufficient funds"
    end
    self.balance = self.balance - v
end

function CreditAccount:getLimit()
    return self.limit or 0
end

creditaccount1 = CreditAccount:new{limit = 2000.00}
creditaccount1:deposit(100.00)
creditaccount1:withdraw(200.00)
print(creditaccount1.balance)
--]]

local table = {}

function table:new()
    local instance = {}
    instance.a = 'a'
    instance.b = 'b'
    instance.c = self.fn
    setmetatable(instance, {
        __index = self,
        __call = self.sayc
    })
    return instance
end

function table:fn()
    print('fn')
end

function table:saya()
    print(self.a)
end

function table:sayb()
    print(self.b)
end

function table:sayc()
    print('c')
end

local c = table:new()
c:saya()
c:sayb()
c:sayc()
c()
print(c.c)

