import 'package:flutter/material.dart';

class SingleColor with ChangeNotifier {
  final String id;
  final String title;
  bool status;

  SingleColor({
    required this.id,    // Hapus tanda @
    required this.title, // Hapus tanda @
    this.status = false,
  });

  void toogleStatus() {
    status = !status;
    notifyListeners();
  }
}