#include <iostream>
 
using namespace std;
 
int main(int argc, char const *argv[])
{
    cin.tie(0);
    ios::sync_with_stdio(false);
 
    int length, temperature, target, place;
    int difference = INT32_MAX;
 
    cin >> length >> temperature >> target;
    
    for(int i = 0; i < length; ++i){
        int t;
        cin >> t;
        t = temperature - t * 0.006;
        if(abs(target - t) < difference){
            place = i;
            difference = abs(target - t);
        }
    }
    
    cout << (place + 1) << "\n";
    return 0;
}