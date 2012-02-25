package bin;
import java.io.FileReader;
import java.io.FileWriter;
import java.io.IOException;

/**
 *
 * @author Benedict Harcourt
 */
public class MinifyCss
{
	public static void main(String[] args) throws IOException
	{
		if (args.length != 2)
		{
			System.err.println("Usage: MinifyCss <input> <output>");
			System.exit(-1);
		}

		CssCompressor c = new CssCompressor(new FileReader(args[0]));
		c.compress(new FileWriter(args[1]), 1000);
	}

	private MinifyCss()
	{
	}
}

