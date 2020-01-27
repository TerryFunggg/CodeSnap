package singleton;

final public class Captain {
	private static Captain captain;
	
	private Captain() {	}
	
	public static synchronized Captain getCaptain()
	{
		// Lazy initialization
		if(captain == null) 
		{
			captain = new Captain();
			System.out.println("New captain is elected for you team.");
		}
		else
		{
			System.out.println("You already have a captain for your team");
			System.out.println("Send him for the toss.");
		}
		return captain;
	}
}
