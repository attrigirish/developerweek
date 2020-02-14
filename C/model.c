typedef enum Brand
{
	BRITANNIA=101,
	ITC=102,
	HUL=103,
	PEPSI=104,
	COKE=105,
	OTHER		
}Brand;

typedef enum Category
{
	TEA=1001,
	BREAD=1002,
	BUISCUIT=1003,
	CHOCOLATE=1004,
	SOFTDRINK=1005
}Category;

typedef struct Product
{
	int pid;
	Category category;
	Brand brand;
	char name[50];
	float price;
	int stock;
}Product;

typedef struct Transaction
{
	int tid;
	char cname[50];
	char phone[11];
	char date[11];
	char time[6];
}Transaction;

typedef struct TransactionItem
{
	int tiid;
	int tid;
	int pid;
	float price;
	int qty;
	double amount;
}TransactionItem; 
