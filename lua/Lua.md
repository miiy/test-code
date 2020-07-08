# Lua

## Bookmarks

Lua: http://www.lua.org

LuaJIT: http://luajit.org

LuaRocks: https://luarocks.org

Lua教程: http://www.runoob.com/lua/lua-tutorial.html

快速掌握Lua5.3: http://blog.csdn.net/column/details/quicklymasterlua5-3.html

## Install Lua

```bash
[root@localhost ~]# yum -y install readline-devel

[root@localhost ~]# cd /usr/local/src
[root@localhost src]# wget https://www.lua.org/ftp/lua-5.3.5.tar.gz
[root@localhost src]# tar -zxvf lua-5.3.5.tar.gz
[root@localhost src]# cd lua-5.3.5
[root@localhost lua-5.3.5]#
root@localhost lua-5.3.5]# cat Makefile |grep INSTALL_TOP
# so take care if INSTALL_TOP is not an absolute path. See the local target.
INSTALL_TOP= /usr/local
INSTALL_BIN= $(INSTALL_TOP)/bin
INSTALL_INC= $(INSTALL_TOP)/include
INSTALL_LIB= $(INSTALL_TOP)/lib
INSTALL_MAN= $(INSTALL_TOP)/man/man1
INSTALL_LMOD= $(INSTALL_TOP)/share/lua/$V
INSTALL_CMOD= $(INSTALL_TOP)/lib/lua/$V
	$(MAKE) install INSTALL_TOP=../install
	@echo "INSTALL_TOP= $(INSTALL_TOP)"
	@echo "prefix=$(INSTALL_TOP)"
[root@localhost lua-5.3.5]# sed -i 's/INSTALL_TOP= \/usr\/local/INSTALL_TOP= \/usr\/local\/lua/' Makefile
[root@localhost lua-5.3.5]# cat Makefile |grep INSTALL_TOP
# so take care if INSTALL_TOP is not an absolute path. See the local target.
INSTALL_TOP= /usr/local/lua
INSTALL_BIN= $(INSTALL_TOP)/bin
INSTALL_INC= $(INSTALL_TOP)/include
INSTALL_LIB= $(INSTALL_TOP)/lib
INSTALL_MAN= $(INSTALL_TOP)/man/man1
INSTALL_LMOD= $(INSTALL_TOP)/share/lua/$V
INSTALL_CMOD= $(INSTALL_TOP)/lib/lua/$V
	$(MAKE) install INSTALL_TOP=../install
	@echo "INSTALL_TOP= $(INSTALL_TOP)"
	@echo "prefix=$(INSTALL_TOP)"
[root@localhost lua-5.3.5]#
[root@localhost lua-5.3.5]# make linux test
[root@localhost lua-5.3.5]# make install
[root@localhost lua-5.3.5]# /usr/local/lua/bin/lua -v
Lua 5.3.5  Copyright (C) 1994-2018 Lua.org, PUC-Rio
```

## Install LuaJIT

openresty已带luajit

```bash
[root@localhost ~]# cd /usr/local/src
[root@localhost src]# wget http://luajit.org/download/LuaJIT-2.0.5.tar.gz
[root@localhost src]# tar -zxvf LuaJIT-2.0.5.tar.gz
[root@localhost src]# cd LuaJIT-2.0.5
[root@localhost LuaJIT-2.0.5]# make PREFIX=/usr/local/luajit
[root@localhost LuaJIT-2.0.5]# make install PREFIX=/usr/local/luajit
[root@localhost LuaJIT-2.0.5]# /usr/local/luajit/bin/luajit -v
LuaJIT 2.0.5 -- Copyright (C) 2005-2017 Mike Pall. http://luajit.org/
[root@localhost LuaJIT-2.0.5]# ls /usr/local/luajit/include/
luajit-2.0
[root@localhost LuaJIT-2.0.5]# echo 'export LUAJIT_LIB=/usr/local/luajit/lib' >> /etc/profile
[root@localhost LuaJIT-2.0.5]# echo 'export LUAJIT_INC=/usr/local/luajit/include/luajit-2.0' >> /etc/profile
[root@localhost LuaJIT-2.0.5]# source /etc/profile
```

## Install  LuaRocks

```bash
[root@localhost ~]# cd /usr/local/src
[root@localhost src]# wget https://luarocks.github.io/luarocks/releases/luarocks-3.0.4.tar.gz
[root@localhost src]# tar -zxpf luarocks-3.0.4.tar.gz
[root@localhost src]# cd luarocks-3.0.4
[root@localhost luarocks-3.0.4]# ./configure --help

#lua
[root@localhost luarocks-3.0.4]# ./configure --prefix=/usr/local/luarocks \
--with-lua=/usr/local/lua

# luajit
[root@localhost luarocks-3.0.4]# ./configure --prefix=/usr/local/luarocks \
--lua-suffix=jit \
--with-lua=/usr/local/luajit \
--with-lua-include=/usr/local/luajit/include/luajit-2.0

[root@localhost luarocks-3.0.4]# make build
[root@localhost luarocks-3.0.4]# make install
[root@localhost luarocks-3.0.4]# /usr/local/luarocks/bin/luarocks --version
/usr/local/luarocks/bin/luarocks 3.0.4
LuaRocks main command-line interface
[root@localhost luarocks-3.0.4]# /usr/local/luarocks/bin/luarocks help



[root@localhost luarocks-3.0.4]# /usr/local/lua/bin/lua
Lua 5.3.5  Copyright (C) 1994-2018 Lua.org, PUC-Rio
> print(package.path)
/usr/local/share/lua/5.3/?.lua;/usr/local/share/lua/5.3/?/init.lua;/usr/local/lib/lua/5.3/?.lua;/usr/local/lib/lua/5.3/?/init.lua;./?.lua;./?/init.lua
> print(package.cpath)
/usr/local/lib/lua/5.3/?.so;/usr/local/lib/lua/5.3/loadall.so;./?.so
> ^C
[root@localhost luarocks-3.0.4]# /usr/local/luarocks/bin/luarocks path --bin
export LUA_PATH='/usr/local/src/luarocks-3.0.4/lua_modules/share/lua/5.1/?.lua;/usr/local/src/luarocks-3.0.4/lua_modules/share/lua/5.1/?/init.lua;/root/.luarocks/share/lua/5.1/?.lua;/root/.luarocks/share/lua/5.1/?/init.lua;/usr/local/luarocks/share/lua/5.1/?.lua;/usr/local/luarocks/share/lua/5.1/?/init.lua;./?.lua;/usr/local/luajit/share/luajit-2.0.5/?.lua;/usr/local/share/lua/5.1/?.lua;/usr/local/share/lua/5.1/?/init.lua;/usr/local/luajit/share/lua/5.1/?.lua;/usr/local/luajit/share/lua/5.1/?/init.lua'
export LUA_CPATH='/usr/local/src/luarocks-3.0.4/lua_modules/lib/lua/5.1/?.so;/root/.luarocks/lib/lua/5.1/?.so;/usr/local/luarocks/lib/lua/5.1/?.so;./?.so;/usr/local/lib/lua/5.1/?.so;/usr/local/luajit/lib/lua/5.1/?.so;/usr/local/lib/lua/5.1/loadall.so'
export PATH='/usr/local/src/luarocks-3.0.4/lua_modules/bin:/root/.luarocks/bin:/usr/local/luarocks/bin:/usr/local/sbin:/usr/local/bin:/usr/sbin:/usr/bin:/root/bin'
```

