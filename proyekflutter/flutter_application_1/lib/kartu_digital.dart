import 'package:flutter/material.dart';

void main() {
  runApp(const KartuProfilApp());
}

class KartuProfilApp extends StatelessWidget {
  const KartuProfilApp({super.key});

  @override
  Widget build(BuildContext context) {
    return MaterialApp(
      debugShowCheckedModeBanner: false,
      title: 'Kartu Profil Digital',
      theme: ThemeData(
        fontFamily: 'Roboto',
        scaffoldBackgroundColor: const Color(0xFFEEF2F5),
      ),
      home: const Scaffold(
        body: Center(
          child: KartuProfilDigital(),
        ),
      ),
    );
  }
}

class KartuProfilDigital extends StatelessWidget {
  const KartuProfilDigital({super.key});

  static const Color teal = Color(0xFF17A2B8);
  static const Color tealDark = Color(0xFF0E7C8F);
  static const Color ink = Color(0xFF1B2430);
  static const Color muted = Color(0xFF6B7685);
  static const Color line = Color(0xFFE4E8ED);
  static const Color red = Color(0xFFE4483C);
  static const Color blueCheck = Color(0xFF2E7DFB);

  @override
  Widget build(BuildContext context) {
    return Container(
      width: 340,
      decoration: BoxDecoration(
        color: Colors.white,
        borderRadius: BorderRadius.circular(10),
        border: Border.all(color: line),
        boxShadow: const [
          BoxShadow(
            color: Color.fromRGBO(0, 0, 0, 0.12),
            blurRadius: 24,
            offset: Offset(0, 8),
          ),
        ],
      ),
      clipBehavior: Clip.antiAlias,
      child: Column(
        mainAxisSize: MainAxisSize.min,
        children: [
          _buildTopBar(),
          const SizedBox(height: 22),
          _buildPhoto(),
          const SizedBox(height: 14),
          _buildNameRow(),
          const SizedBox(height: 2),
          _buildSubtitle(),
          const SizedBox(height: 20),
          _buildStats(),
          _buildSegments(),
          _buildFooter(),
          _buildTopBar(),
        ],
      ),
    );
  }

  Widget _buildTopBar() {
    return Container(
      height: 14,
      decoration: const BoxDecoration(
        gradient: LinearGradient(
          colors: [teal, tealDark],
          begin: Alignment.centerLeft,
          end: Alignment.centerRight,
        ),
      ),
    );
  }

  Widget _buildPhoto() {
    return Container(
      width: 92,
      height: 92,
      decoration: BoxDecoration(
        shape: BoxShape.circle,
        gradient: const LinearGradient(
          colors: [Color(0xFFCFD8E0), Color(0xFF9FB0BF)],
          begin: Alignment.topLeft,
          end: Alignment.bottomRight,
        ),
        border: Border.all(color: Colors.white, width: 3),
        boxShadow: const [
          BoxShadow(color: line, spreadRadius: 1),
        ],
      ),
      alignment: Alignment.center,
      child: const Text(
        'LK',
        style: TextStyle(
          color: Colors.white,
          fontSize: 34,
          fontWeight: FontWeight.w600,
        ),
      ),
    );
  }

  Widget _buildNameRow() {
    return const Row(
      mainAxisAlignment: MainAxisAlignment.center,
      children: [
        Text(
          'Lili Kurnia Putri',
          style: TextStyle(
            fontSize: 18,
            fontWeight: FontWeight.bold,
            color: ink,
          ),
        ),
        SizedBox(width: 6),
        Icon(Icons.verified, color: blueCheck, size: 17),
      ],
    );
  }

  Widget _buildSubtitle() {
    return const Padding(
      padding: EdgeInsets.symmetric(horizontal: 20),
      child: Text(
        'Mahasiswa Politeknik Negeri Jember',
        textAlign: TextAlign.center,
        style: TextStyle(fontSize: 12.5, color: muted),
      ),
    );
  }

  Widget _buildStats() {
    return Container(
      decoration: const BoxDecoration(
        border: Border(top: BorderSide(color: line)),
      ),
      child: Row(
        children: [
          _statItem('142', 'Post'),
          _divider(),
          _statItem('1.350', 'Pengikut'),
          _divider(),
          _statItem('97', 'Mengikuti'),
        ],
      ),
    );
  }

  Widget _divider() {
    return Container(width: 1, height: 40, color: line);
  }

  Widget _statItem(String number, String label) {
    return Expanded(
      child: Padding(
        padding: const EdgeInsets.symmetric(vertical: 14, horizontal: 4),
        child: Column(
          children: [
            Text(
              number,
              style: const TextStyle(
                fontSize: 16,
                fontWeight: FontWeight.bold,
                color: ink,
              ),
            ),
            const SizedBox(height: 2),
            Text(
              label,
              style: const TextStyle(fontSize: 11, color: muted),
            ),
          ],
        ),
      ),
    );
  }

  Widget _buildSegments() {
    return SizedBox(
      height: 34,
      child: Row(
        children: [
          Expanded(
            flex: 2,
            child: Container(
              color: teal,
              alignment: Alignment.center,
              child: const Text(
                'flex: 2',
                style: TextStyle(
                  color: Colors.white,
                  fontSize: 11,
                  fontWeight: FontWeight.w600,
                ),
              ),
            ),
          ),
          Expanded(
            flex: 1,
            child: Container(
              color: red,
              alignment: Alignment.center,
              child: const Text(
                'flex: 1',
                style: TextStyle(
                  color: Colors.white,
                  fontSize: 11,
                  fontWeight: FontWeight.w600,
                ),
              ),
            ),
          ),
        ],
      ),
    );
  }

  Widget _buildFooter() {
    return const Padding(
      padding: EdgeInsets.fromLTRB(18, 16, 18, 20),
      child: Text(
        'Program Studi Teknik Informatika',
        textAlign: TextAlign.center,
        style: TextStyle(
          fontSize: 11,
          letterSpacing: 0.3,
          color: muted,
        ),
      ),
    );
  }
}