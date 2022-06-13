#include <iostream>
#include <string>

using namespace std;

class employee

{

public:
    string emp_id, emp_name;
    int emp_salary;

    void accept()

    {

        cout << "Enter employee id : ";

        cin >> emp_id;

        cout << "Enter employee name : ";

        cin >> emp_name;

        cout << "Enter salary : ";

        cin >> emp_salary;
    }

    void display()

    {

        cout << "Employee id : " << emp_id << endl;

        cout << "Employee name : " << emp_name << endl;

        cout << "Salary : " << emp_salary << endl;
    }
};

int main()

{

    int n;

    cout << "Enter number of employees : ";

    cin >> n;

    employee obs[n];

    for (int i = 0; i < n; i++)

    {

        obs[i].accept();
    }

    cout << "Employees having salary greater than 25000 : " << endl;

    for (int i = 0; i < n; i++)

    {

        if (obs[i].emp_salary > 25000)

        {

            obs[i].display();
        }
    }

    return 0;
}