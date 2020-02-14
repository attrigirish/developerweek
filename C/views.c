#include<stdio.h>
#include"model.c"

void ProductView(){
	int choice;
	Product p;
	Product *products;
	int numRecords;
	int i;
	
	
	while(1){
		system("cls");
		printf("1. Add Product\n");
		printf("2. Display Products\n");
		printf("3. Delete Product\n");
		printf("4. Update Product\n");
		printf("0. Exit\n");
				
		printf("\n\n");
		printf("Enter Choice : ");
		scanf("%d",&choice);
		printf("\n\n");
		
		switch(choice){
			case 1:
				printf("Enter Product Id : ");
				scanf("%d",&p.pid);
				fflush(stdin);
				printf("Enter Name : ");
				gets(p.name);
				printf("Categories [TEA=1001,BREAD=1002,BUISCUIT=1003,CHOCOLATE=1004,SOFTDRINK=1005] ");
				printf("Enter Category Code : ");
				scanf("%d",&p.category);
				printf("Brands [BRITANNIA=101,ITC=102,HUL=103,PEPSI=104,COKE=105,OTHER]");
				printf("Enter Brand Code : ");
				scanf("%d",&p.brand);
				printf("Enter Price : ");
				scanf("%f",&p.price);
				printf("Enter Stock : ");
				scanf("%d",&p.stock);
				
				AddProduct(p);
				break;
			
			case 2:
				products=GetProducts(&numRecords);				
				printf("|%-8s|%-18s|%-14s|%-14s|%-10s|%-6s|\n","ID","Name","Brand","Category","Price","Stock");
				for(i=0;i<numRecords;i++){
					printf("|%-8d",products[i].pid);
					printf("|%-18s",products[i].name);
					printf("|%-14d",products[i].brand);
					printf("|%-14d",products[i].category);
					printf("|%-10f",products[i].price);
					printf("|%-6d",products[i].stock);					
					printf("|\n");
				}
				break;
				
			case 0:
				return;
		}
		char temp;
		fflush(stdin);
		scanf("%c",&temp);
	}
}
