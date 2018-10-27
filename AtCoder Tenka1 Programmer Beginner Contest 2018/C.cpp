#include <iostream>
#include <string>
#include <vector>
#include <algorithm>

using namespace std;

int main(int argc, char const *argv[]){
    cin.tie(0);
    ios::sync_with_stdio(false);

    int length;
    vector<int> array, coefficient0, coefficient1;
    int n;
    cin >> length;
    while(cin >> n){
        array.push_back(n);
    }
    sort(array.begin(), array.end());

    coefficient0.push_back(-1);
    coefficient1.push_back(1);
    for(int i = 1; i < length - 1; ++i)
    {
        if(i % 2){
            coefficient0.push_back(2);
            coefficient1.push_back(-2);
        }else{
            coefficient0.push_back(-2);
            coefficient1.push_back(2);
        }
    }

    if(length % 2){
        coefficient0.push_back(-1);
        coefficient1.push_back(1);
    }else{
        coefficient0.push_back(1);
        coefficient1.push_back(-1);
    }

    sort(coefficient0.begin(), coefficient0.end());
    sort(coefficient1.begin(), coefficient1.end());
    
    long long ans0 = 0;
    long long ans1 = 0;
    
    for(int i = 0; i < length; i++){
        ans0 += array[i] * coefficient0[i];
        ans1 += array[i] * coefficient1[i];
    }

    cout << max(ans0, ans1) << "\n";
    return 0;
}