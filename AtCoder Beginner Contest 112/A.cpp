#include <iostream>
using namespace std;

int main(int argc, char const *argv[])
{
    cin.tie(0);
    ios::sync_with_stdio(false);

    int n;
    cin >> n;
    
    if(n - 1){
        int a, b;
        cin >> a >> b;
        cout << (a + b) << "\n";

    }else{
        cout << "Hello World\n";
    }

    return 0;
}