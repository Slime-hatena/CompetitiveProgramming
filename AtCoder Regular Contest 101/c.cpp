#include <iostream>
#include <vector>

using namespace std;

int main(int argc, char const *argv[])
{
    cin.tie(0);
    ios::sync_with_stdio(false);

    int n, k;
    cin >> n >> k;

    vector<int> candle;

    while (true) {
        int i;
        std::cin >> i;
        if (!std::cin.good()) break;
        candle.push_back(i);
    }

    int min = 2147483647;
    
    for(int i = 0; i <= n - k; ++i){
        int a = 0;
        a += (candle[i] < 0) ? -candle[i] : candle[i];

        for(int j = 0; j < k - 1; ++j){
            a += ((candle[i + j] < candle[i + j + 1]) ? candle[i + j + 1] - candle[i + j] : candle[i + j] - candle[i + j + 1]);
            if(min < a){
                break;
            }
        }
        min = (min > a) ? a : min;
    }

    for(int i = n - 1; i >= k - 1; --i){
        int a = 0;
        a += (candle[i] < 0) ? -candle[i] : candle[i];

        for(int j = 0; j < k - 1; ++j){
            a += ((candle[i - j] < candle[i - j - 1]) ? candle[i - j - 1] - candle[i - j] : candle[i - j] - candle[i - j - 1]);
            if(min < a){
                break;
            }
        }
        min = (min > a) ? a : min;
    }

    cout << min << endl;

    return 0;
}

