#include <stdio.h>

// Generic pointer can't dereferenced, cus dun know the data type.
// Usually used to hold the pointers.
// Generic pointers are handy to define generic function that can accept a wide
// range og different pointers as their input arguments.

void print_bytes(void* data, size_t length) {
	char delim = ' ';
	unsigned char* ptr = data;

	for (size_t i = 0; i < length; i++) {
		printf("%c 0x%x", delim, *ptr);
		delim = ',';
		ptr++;
	}

	printf("\n");
}

int main(void) {
	int a = 9;
	double b = 19.2;

	print_bytes(&a, sizeof(int));
	print_bytes(&b, sizeof(double));

	printf("%d\n", sizeof(char*));

	return 0;
}
