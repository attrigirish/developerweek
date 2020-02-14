#include <stdio.h>

#define ProductFile "product.dat"
#define TransactionFile "transaction.dat"
#define TransactionItemFile "transactionitem.dat"

#include "model.c"


/* Product Database Logic */

void AddProduct(Product p){
	FILE *file = fopen(ProductFile, "ab");
	fwrite((char*)&p, sizeof(p), 1 ,file);
	fclose(file);
}

Product* GetProducts(int *numRecords){
	int i;
	FILE *file = fopen(ProductFile, "rb");
	fseek(file,0,2);
	*numRecords = (ftell(file)+1)/sizeof(Product);
	fseek(file,0,0);
	Product *p = (Product*)malloc(*numRecords*sizeof(Product));	
	fread((char*)p, sizeof(Product), *numRecords, file);		
	fclose(file);
	return p;	
}


void DeleteProduct(int pid){
	int i,j;
	int numRecords;
	Product *p = GetProducts(&numRecords);	
	//Deletion
	
	for(i=0;i<numRecords;i++)
	{
		if(p[i].pid==pid){
			for(j=i;j<numRecords-1;j++){
				p[j]=p[j+1];
			}
		}	
	}	
	
	numRecords--;

	FILE *file = fopen(ProductFile, "wb");
	fwrite((char*)p, sizeof(Product) , numRecords ,file);
	fclose(file);	
}

void UpdateProduct(Product pr)
{
	int i;
	int numRecords;
	Product *p = GetProducts(&numRecords);	
	
	for(i=0;i<numRecords;i++)
	{
		if(p[i].pid==pr.pid){
			strcpy(p[i].name,pr.name);
			p[i].brand=pr.brand;
			p[i].category=pr.category;
			p[i].price=pr.price;
			p[i].stock=pr.stock;
		}	
	}	
		
	FILE *file = fopen(ProductFile, "wb");
	fwrite((char*)p, sizeof(Product) , numRecords ,file);
	fclose(file);		
}
