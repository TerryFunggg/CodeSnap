import 'package:flutter/material.dart';
import 'package:mi_card/my_card.dart';
import 'package:mi_card/constants.dart';

void main() {
  runApp(MyApp());
}

class MyApp extends StatelessWidget {
  @override
  Widget build(BuildContext context) {
    return MaterialApp(
      home: Scaffold(
        backgroundColor: Colors.blueGrey,
        body: Column(
          mainAxisAlignment: MainAxisAlignment.center,
          children: [
            CircleAvatar(
              radius: 50,
              backgroundImage: AssetImage('images/icon.jpg'),
            ),
            Text(
              "Terry Fung",
              style: kNameStyle,
            ),
            Text(
              "Flutter Developer",
              style: kTitleStyle,
            ),
            SizedBox(
              height: 10.0,
              width: 160.0,
              child: Divider(
                color: Colors.white,
              ),
            ),
            MyCard(
              text: "+123 45678",
              icon: Icons.phone,
            ),
            MyCard(
              text: "terryyesfung@gmail.com",
              icon: Icons.mail,
            ),
          ],
        ),
      ),
    );
  }
}
