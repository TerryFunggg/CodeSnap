package prototype;

public class Nano extends BasicCar 
{
	//A base price for Nano
	public int basePrice = 100000;
	public Nano(String m) 
	{
		modelName = m;
	}
	
	@Override
	public BasicCar clone() throws CloneNotSupportedException {
		// TODO Auto-generated method stub
		return (Nano)super.clone();
	}
}
