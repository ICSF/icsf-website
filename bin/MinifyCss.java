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
		if (args.length != 1)
		{
			System.err.println("Usage: MinifyCss <file>");
			System.exit(-1);
		}

		FileReader f = new FileReader(args[0]);
		CssCompressor c = new CssCompressor(f);
		f.close();

		FileWriter out = new FileWriter(args[0]);

		c.compress(out, 1024);
		out.flush();
		out.close();
	}

	private MinifyCss()
	{
	}
}

