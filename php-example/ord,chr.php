<?php

for($i = ord('A'); $i <= ord('z'); $i++) {
    echo chr($i) . ",";
}

echo "\n";
echo "a: " . ord('a') . "\n";
echo "A: " . ord('A') . "\n";

// output
// A,B,C,D,E,F,G,H,I,J,K,L,M,N,O,P,Q,R,S,T,U,V,W,X,Y,Z,[,\,],^,_,`,a,b,c,d,e,f,g,h,i,j,k,l,m,n,o,p,q,r,s,t,u,v,w,x,y,z,
// a: 97
// A: 65