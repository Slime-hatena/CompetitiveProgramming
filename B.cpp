#include <iostream>
#include <string>
#include <vector>

using namespace std;

// iHaveNoIdea();

unsigned int flag = 0;
unsigned int flagAll = 0;

class Tree{
private:
    vector<Tree> childs;

public:
    int left;
    int num;
    int right;
    int pos;

    Tree(vector<int> blocks, int p = -1, int deleteCount = -1){
        pos = p;

        if(deleteCount != -1){
            num = blocks[deleteCount];

            try{
                left = blocks[deleteCount - 1];
            }
            catch(const std::exception& e)
            {
                left = 0;
            }

            try{
                right = blocks[deleteCount + 1];
            }
            catch(const std::exception& e)
            {
                right = 0;
            }
            
            blocks[deleteCount] = -1;
        }

        int size = blocks.size();
        for(int i = 0; i < size; ++i){
            if(blocks[i] == -1){
                continue;
            }
            childs.push_back(Tree(blocks, i, i));
        }
    }

    int sumBegin(){
        int ret = 0;
        for(Tree t: childs){
            flag = flagAll;
            ret += t.sum();
        }
        return ret;
    }

    int sum(){
        int ret = num;
        if(flag & (0x01 << (pos - 1))){
            ret += left;
        }
        if(flag & (0x01 << (pos + 1))){
            ret += left;
        }
        
        for(Tree t: childs){
            flag |= (0x01 << pos);
            ret += t.sum();
        }
        return ret;
    }
};

int main(int argc, char const *argv[])
{
    cin.tie(0);
    ios::sync_with_stdio(false);

    int n;
    vector<int> blocks;
    cin >> n;

    for(int i = 0; i < n; ++i)
    {
        int tmp;
        cin >> tmp;
        blocks.push_back(tmp);
        flagAll |= (0x01 << i);
    }

    vector<Tree> begin;
    Tree tree(blocks);
    cout << tree.sumBegin();

    return 0;
}