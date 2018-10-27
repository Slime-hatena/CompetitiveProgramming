#include <iostream>
#include <string>
#include <vector>

using namespace std;

int main(int argc, char const *argv[])
{
    cin.tie(0);
    ios::sync_with_stdio(false);

    int takahashi, aoki, count;
    cin >> takahashi >> aoki >> count;

    for(int i = 0; i < count; ++i)
    {
        if(i % 2){
            if(aoki % 2){
                --aoki;
            }
            int a = aoki / 2;

            takahashi += a;
            aoki -= a;

        }else{
            if(takahashi % 2){
                --takahashi;
            }
            int t = takahashi / 2;

            takahashi -= t;
            aoki += t;

        }
    }
    cout << takahashi << " " << aoki;

    return 0;
}