import 'package:flutter/material.dart';
import 'package:mi_card/constants.dart';

class MyCard extends StatelessWidget {
  MyCard({this.text, this.icon});
  final String text;
  final IconData icon;

  @override
  Widget build(BuildContext context) {
    return Card(
      margin: EdgeInsets.symmetric(vertical: 10.0, horizontal: 25.0),
      color: Colors.white,
      child: ListTile(
        leading: Icon(icon),
        title: Text(
          text,
          style: kCardStyle,
        ),
      ),
    );
  }
}
