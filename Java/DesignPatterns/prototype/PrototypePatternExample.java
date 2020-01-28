package prototype;

public class PrototypePatternExample {

	public static void main(String[] args) throws CloneNotSupportedException {
		System.out.println("***Protoype Pattern Demo***\n");
		BasicCar nanoBasicCar = new Nano("Green Nano");
		nanoBasicCar.basePrice = 100000;
		
		BasicCar fordBasicCar = new Ford("Ford Yellow");
		fordBasicCar.basePrice = 500000;
		
		// Clone from Nano
		BasicCar bc1 = nanoBasicCar.clone();
		bc1.onRoadPrice = nanoBasicCar.basePrice + BasicCar.setAdditionalPrice();
		System.out.println("Car is: "+ bc1.modelName + " and it's price is Rs." + bc1.onRoadPrice);
		
		//Ford
		bc1 = fordBasicCar.clone();
		bc1.onRoadPrice = fordBasicCar.basePrice + BasicCar.setAdditionalPrice();
		System.out.println("Car is:" + bc1.modelName + " and it's price is Rs." + bc1.onRoadPrice);
	}
}
