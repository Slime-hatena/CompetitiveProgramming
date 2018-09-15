#include <iostream>
#include <string>
#include <vector>
#include <string.h>

using namespace std;

int main(int argc, char const *argv[])
{
    int n, k;
    cin >> n >> k;

    vector<int> candle;
    vector<int> times;

    while (true) {
        int i;
        std::cin >> i;
        if (!std::cin.good()) break;
        candle.push_back(i);
    }

    
    for(int i = 0; i <= n - k; ++i){
        int a = 0;
        cout << i << " ~ " << (i + k) << " : ";
        a += (candle[i] < 0) ? -candle[i] : candle[i];
        cout << a;

        for(int j = 0; j < k - 1; ++j){
            int val1 = candle[i + j];
            int val2 = candle[i + j + 1];
            cout << " + " << ((val1 < val2) ? val2 - val1 : val1 - val2);
            a += ((val1 < val2) ? val2 - val1 : val1 - val2);
        }
        cout << " = " << a << endl; 
        times.push_back(a);
    }

    for(int i = n - 1; i >= k - 1; --i){
        int a = 0;
        cout << i << " ~ " << (i - k + 1) << " : ";
        a += (candle[i] < 0) ? -candle[i] : candle[i];
        cout << a;

        for(int j = 0; j < k - 1; ++j){
            int val1 = candle[i - j];
            int val2 = candle[i - j - 1];
            cout << " + " << ((val1 < val2) ? val2 - val1 : val1 - val2);
            a += ((val1 < val2) ? val2 - val1 : val1 - val2);
        }
        cout << " = " << a << endl; 
        times.push_back(a);
    }

    int min = 100;
    for(int x : times){
	    min = (min > x) ? x : min;
    }
    cout << min << endl;

    return 0;
}