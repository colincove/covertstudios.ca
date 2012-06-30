<html xmlns="http://www.w3.org/1999/xhtml" lang="en">
<head>
<link rel="stylesheet" type="text/css" href="shadowbox-3.0.3/shadowbox.css">
<link rel="stylesheet" type="text/css" href="css/blogStyle.css">
<link rel="stylesheet" type="text/css" href="css/navStyle.css">
<link rel="stylesheet" type="text/css" href="css/headerStyle.css">
<link rel="stylesheet" type="text/css" href="css/grid.css">
<link rel="stylesheet" type="text/css" href="css/comments.css">
<link href="css/prettify.css" type="text/css" rel="stylesheet" />
<script type="text/javascript" src="js/prettify.js"></script>
<script type="text/javascript" src="shadowbox-3.0.3/shadowbox.js"></script>
<script type="text/javascript">
Shadowbox.init({
    handleOversize: "drag",
    modal: true
});
</script>
	<link type="text/css" href="pikachoose-4.4.3/styles/bottom.css" rel="stylesheet" />
		<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.6/jquery.js"></script>
		<script type="text/javascript" src="pikachoose-4.4.3/lib/jquery.pikachoose.js"></script>
				<script type="text/javascript" src="js/blogFunctions.js"></script>
		<script language="javascript">
			$(document).ready(
				function (){
					$("#pikame").PikaChoose({carousel:true});
				});
		</script>
</head>
<body onload="prettyPrint()">
<div class="container container_12 centeringDiv"  >
<?php
include('blogHeader.php');
include('utils/dateUtil.php');
?>
<!--<div class="container container_12" >-->
<div class="grid_8 blogContent">
<?php
 include("webservices/blog.php");
 $con=  mysql_connect("colincoveblog.db.8574327.hostedresource.com","colincoveblog","Sql@345678");
if(isset($_GET['viewPost']))
{
displayPost($_GET['viewPost'], $con);
}else{
 getFrontPage($con);
}

 ?>
 <h1>GGJ Rot Runner Code Snippet</h1>

<p>

I was looking to post some of the code that I wrote for the Vancouver Global Game Jam. While not all of it is mine, I did lay the base for most of it. There will be more code to show when the time comes. It has been a great experience learning the XNA framework and and glad to have a game under my belt. For now, I will display the basic structure for level definition and creation.</p>

<p>

First is the LevelBase object which is the base class for all levels:

</p>

<pre  class="code prettyprint" >

using System;

using System.Collections.Generic;

using System.Linq;

using System.Text;

using Microsoft.Xna.Framework;



namespace WindowsGame1

{



    public class LevelBase : GameComponent

    {

        private Game game;

        public char[,] levelDefinition;

        public int width = 0;

        public int height = 0;



        //hero properties

        private int blockCount;



        //death cloud properties

        private bool deathCloudEnabled;

        public DeathCloud deathCloud;

        private float speed;

        private float itemChance;

        private int itemLimit;

        private float cloudChance;

        private int cloudLimit;



        public LevelBase(Game game)

            : base(game)

        {

            this.game = game;

            game.Components.Add(this);

        }



        //make the level constructors call this

        public void setHeroParams(int initialBlockCount = 1234)

        {

            blockCount = initialBlockCount;

            Game1.staticHero.blockCount = initialBlockCount;

        }



        //make the level constructors call this

        public void setDeathCloudParams(bool enabled, float speed = 1.5f,

            float itemChance = 0.01f, 

			int itemLimit = 10, 

			float cloudChance = 0.01f,

			int cloudLimit = 10)

        {

            this.deathCloudEnabled = enabled;

            this.speed = speed;

            this.itemChance = itemChance;

            this.itemLimit = itemLimit;

            this.cloudChance = cloudChance;

            this.cloudLimit = cloudLimit;

        }



        public override void Initialize()

        {

            base.Initialize();

        }



        public virtual void create()

        {

            //build the map

            for (int i = 0; i < height; i++)

            {

                for (int j = 0; j < width; j++)

                {

                    char currentType = levelDefinition[i, j];

                    WorldObject obj;

                    switch (currentType)

                    {

                        case BlockEnum.EMPTY:

                            continue;

                        case BlockEnum.CHAR_SPAWN:

                            obj = new Hero(Game, Game1.staticContent, j * 50, i * 50, blockCount);

                            continue;

                        default:

                            obj = BlockFactory.getBlock(currentType, game, j * 50, i * 50);

                            Game1.addPhysicsObject(obj);

                            continue;

                    }



                }

            }



            //set death cloud

            if (deathCloudEnabled)

            {

                deathCloud = new DeathCloud(Game, -3000, 0, speed, itemChance, itemLimit, cloudChance, cloudLimit);

            }

        }

        public void unloadLevel()

        {

            if (deathCloudEnabled)

            {

                deathCloud.removedObj();

            }

            deathCloud = null;

        }

    }

}



</pre>

<p>

And there here is an example of level code. It first defines the width, height, and then the initial placement of blocks to be created for the level in the form of a 2 dimensional array:

</p>

<pre class="code" >

using System;

using System.Collections.Generic;

using System.Linq;

using System.Text;

using Microsoft.Xna.Framework;



namespace WindowsGame1

{

    public class Level1 : LevelBase

    {

        public Level1(Game game)

            : base(game)

        {

            width = 60;

            height = 10;

            levelDefinition = new char[,] 

                {{'X','X','X','X','X','X','X','X','X','X','X','X','X','X','X','X','X','X','X','X','X','X','X','X','X','X','X','X','X','X','X','X','X','X','X','X','X','X','X','X','X','X','X','X','X','X','X','X','X','X','X','X','X','X','X','X','X','X','X','X'},

                 {'X','X','X','X','X','X','X','X','X','X','X','X','X','X','X','X','X','X','Y','X','X','X','X','X','X','X','X','X','X','X','X','X','X','X','X','X','X','X','X','X','X','X','X','X','X','X','X','X','X','X','X','X','X','X','X','X','X','X','X','X'},

                 {'X','X','X','X','X','X','X','X','X','X','X','X','G','C','G','G','X','X','X','X','X','X','X','X','X','X','X','X','X','X','X','X','X','X','X','X','X','X','X','X','X','X','X','X','X','X','X','X','X','X','X','X','X','X','X','X','X','X','X','X'},

                 {'X','Y','X','X','X','X','X','X','X','@','X','X','X','X','X','X','X','X','X','X','X','X','X','X','X','Y','X','X','X','X','C','G','G','X','G','X','C','G','C','X','X','G','G','G','G','G','X','X','X','X','X','X','X','X','X','X','X','X','X','X'},

                 {'X','X','X','X','X','G','C','G','C','X','G','G','X','X','X','X','G','G','C','X','X','G','X','X','X','X','X','X','X','X','X','X','X','X','X','X','X','X','X','X','X','X','X','X','X','X','X','X','G','G','X','X','X','X','G','C','C','G','G','X'},

                 {'X','X','X','G','G','X','X','X','X','X','X','X','X','X','X','X','X','X','X','X','Y','X','X','X','I','X','X','C','G','X','X','X','X','X','X','Y','X','X','X','X','X','X','X','X','X','X','X','I','X','X','X','X','X','X','X','X','X','X','X','X'},

                 {'I','X','X','X','X','X','X','X','X','X','X','X','X','Y','G','G','X','X','X','X','X','X','X','X','I','X','X','Y','X','X','X','X','X','X','X','X','X','I','X','X','X','X','G','G','X','X','X','I','X','X','X','X','I','X','X','X','X','X','X','X'},

                 {'I','X','X','X','X','X','X','I','I','X','X','X','X','X','X','X','X','X','X','X','X','I','I','I','I','X','X','X','X','X','X','X','X','X','X','X','X','I','X','X','X','X','X','X','X','I','X','X','X','X','X','X','I','X','X','I','I','X','X','X'},

                 {'I','I','I','I','I','I','I','I','I','I','I','I','I','I','I','D','D','D','D','D','D','D','D','D','I','I','I','I','I','I','I','I','I','I','I','I','I','I','I','I','I','I','I','I','I','I','I','I','I','I','I','I','I','I','I','I','I','I','I','I'},

                 {'G','G','G','G','G','G','G','G','G','G','G','G','G','G','G','G','G','G','G','G','G','G','G','G','G','G','G','G','G','G','G','G','G','G','G','G','G','G','G','G','G','G','G','G','G','G','G','G','G','G','G','G','G','G','G','G','G','G','G','G'},

                 {'X','X','X','X','X','X','X','X','X','X','X','X','X','X','X','X','X','X','X','X','X','X','X','X','X','X','X','X','X','X','X','X','X','X','X','X','X','X','X','X','X','X','X','X','X','X','X','X','X','X','I','I','I','I','I','I','I','I','I','I'}};

            setDeathCloudParams(true, 1.9f, 0.03f, 4, 0.01f, 10);

        }

        public override void create(){

            base.create();

            setHeroParams(20); 

        }

    }

}





</pre>

<p>

And that is essentially it. Along with the BlockFactory object, levels can be easily instantiated from these classes. Levels with any extra logic can be handled in their own classes, only needing to extend level base.

</p>
 </div>
 <?php
 include('blogNav.php');
 ?>
 </div>
 <!--</div>-->
</body>
</html>
