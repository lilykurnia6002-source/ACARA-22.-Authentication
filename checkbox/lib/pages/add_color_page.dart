import 'package:flutter/material.dart';
import 'package:provider/provider.dart';

import '../providers/colors.dart';

class AddColorPage extends StatelessWidget {
  static const routeName = "/add";

  final TextEditingController titleController = TextEditingController();

  @override
  Widget build(BuildContext context) {
    var colorsClass = Provider.of<MultiColor>(context, listen: false);

    void saveData() {
      if (titleController.text.isNotEmpty) {
        colorsClass.addColor(titleController.text);
        Navigator.pop(context); // Kembali ke HomePage setelah simpan
      }
    }

    return Scaffold(
      appBar: AppBar(
        title: Text("Add Color"),
      ),
      body: Padding(
        padding: const EdgeInsets.all(20.0),
        child: Column(
          children: [
            TextField(
              controller: titleController,
              autofocus: true,
              decoration: InputDecoration(
                labelText: "Color Title",
                border: OutlineInputBorder(),
              ),
            ),
            SizedBox(height: 20),
            ElevatedButton(
              onPressed: saveData,
              child: Text("Save"),
            ),
          ],
        ),
      ),
    );
  }
}