#!/usr/local/bin/lua
-- local
local a = 1
function abc()
    b = 2
    local c = 3
    print(a)
end
abc()
print(b)
print(c)

x=1
y=2

x, y = y, x

print(x)
print(y)
--

local ss = string.char("0x03")
print(ss)