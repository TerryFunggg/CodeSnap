package prototype;
import java.util.Random;

public abstract class BasicCar implements Cloneable
{
	public String modelName;
	public int basePrice,onRoadPrice;
	
	public String getModelName() 
	{
		return modelName;
	}
	public void setModelName(String modelName) 
	{
		this.modelName = modelName;
	}
	
	public static int setAdditionalPrice() 
	{
		int price = 0;
		Random r = new Random();
		int p = r.nextInt(100000);
		price = p;
		return price;
	}
	
	public BasicCar clone() throws CloneNotSupportedException
	{
		return (BasicCar) super.clone();
	}
	
	
}
