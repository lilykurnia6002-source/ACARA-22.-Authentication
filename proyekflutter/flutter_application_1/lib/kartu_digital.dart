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
      title: 'Profil Instagram',
      theme: ThemeData(
        fontFamily: 'Roboto',
        scaffoldBackgroundColor: Colors.white,
      ),
      home: const Scaffold(
        body: SafeArea(
          child: ProfilInstagram(),
        ),
      ),
    );
  }
}

class ProfilInstagram extends StatelessWidget {
  const ProfilInstagram({super.key});

  @override
  Widget build(BuildContext context) {
    return SingleChildScrollView(
      child: Column(
        crossAxisAlignment: CrossAxisAlignment.start,
        children: [
          _buildTopAppBar(),
          _buildProfileHeader(),
          _buildBioSection(),
          _buildActionButtons(),
          _buildProfessionalDashboard(),
          _buildEditProfileButtons(),
          _buildStoryHighlights(),
          _buildTabBar(),
          _buildEmptyPostSection(),
        ],
      ),
    );
  }

  // Appbar atas (Username, tombol +, threads, menu)
  Widget _buildTopAppBar() {
    return Padding(
      padding: const EdgeInsets.symmetric(horizontal: 16, vertical: 10),
      child: Row(
        children: [
          const Icon(Icons.add_box_outlined, size: 26),
          const SizedBox(width: 16),
          Row(
            children: const [
              Text(
                'callme.lyniaa_',
                style: TextStyle(
                  fontSize: 20,
                  fontWeight: FontWeight.bold,
                  color: Colors.black,
                ),
              ),
              Icon(Icons.keyboard_arrow_down, size: 20),
              SizedBox(width: 4),
              Icon(Icons.circle, color: Colors.red, size: 8),
            ],
          ),
          const Spacer(),
          const Icon(Icons.alternate_email, size: 24),
          const SizedBox(width: 16),
          const Icon(Icons.menu, size: 28),
        ],
      ),
    );
  }

  // Bagian Foto Profil + Angka Statistik
  Widget _buildProfileHeader() {
    return Padding(
      padding: const EdgeInsets.symmetric(horizontal: 16, vertical: 8),
      child: Row(
        children: [
          // Foto Profil dengan badge tambah
          Stack(
            children: [
              Container(
                width: 80,
                height: 80,
                decoration: BoxDecoration(
                  shape: BoxShape.circle,
                  border: Border.all(color: Colors.grey.shade300, width: 1),
                  image: const DecorationImage(
                    image: AssetImage('assets/profile.jpg'),
                    fit: BoxFit.cover,
                  ),
                ),
              ),
              Positioned(
                right: 0,
                bottom: 0,
                child: Container(
                  padding: const EdgeInsets.all(2),
                  decoration: const BoxDecoration(
                    color: Colors.blue,
                    shape: BoxShape.circle,
                  ),
                  child: const Icon(
                    Icons.add,
                    color: Colors.white,
                    size: 16,
                  ),
                ),
              ),
            ],
          ),
          const SizedBox(width: 20),
          // Angka Statistik
          Expanded(
            child: Row(
              mainAxisAlignment: MainAxisAlignment.spaceEvenly,
              children: [
                _buildStatColumn('0', 'postingan'),
                _buildStatColumn('595', 'pengikut'),
                _buildStatColumn('440', 'mengikuti'),
              ],
            ),
          ),
        ],
      ),
    );
  }

  Widget _buildStatColumn(String count, String label) {
    return Column(
      children: [
        Text(
          count,
          style: const TextStyle(fontSize: 16, fontWeight: FontWeight.bold),
        ),
        Text(
          label,
          style: const TextStyle(fontSize: 13, color: Colors.black87),
        ),
      ],
    );
  }

  // Bio Profil (Tanpa wa.me)
  Widget _buildBioSection() {
    return Padding(
      padding: const EdgeInsets.symmetric(horizontal: 16, vertical: 4),
      child: Column(
        crossAxisAlignment: CrossAxisAlignment.start,
        children: [
          Row(
            children: const [
              Text(
                'i\'m lyniaa',
                style: TextStyle(fontWeight: FontWeight.bold, fontSize: 14),
              ),
              SizedBox(width: 4),
              Icon(Icons.check_circle_outline, size: 14, color: Colors.grey),
            ],
          ),
          const Text('Pelatih', style: TextStyle(color: Colors.grey, fontSize: 13)),
          const Text('Jember 🎈', style: TextStyle(fontSize: 13)),
        ],
      ),
    );
  }

  // Tombol Tautan (Tanpa Whatsapp)
  Widget _buildActionButtons() {
    return Padding(
      padding: const EdgeInsets.symmetric(horizontal: 16, vertical: 8),
      child: Wrap(
        spacing: 8,
        children: [
          _buildChipButton(Icons.alternate_email, 'callme.lyniaa_'),
          _buildChipButton(Icons.add, 'Tambahkan'),
        ],
      ),
    );
  }

  Widget _buildChipButton(IconData icon, String label) {
    return Container(
      padding: const EdgeInsets.symmetric(horizontal: 10, vertical: 6),
      decoration: BoxDecoration(
        color: const Color(0xFFEFF2F5),
        borderRadius: BorderRadius.circular(16),
      ),
      child: Row(
        mainAxisSize: MainAxisSize.min,
        children: [
          Icon(icon, size: 14, color: Colors.black),
          const SizedBox(width: 4),
          Text(
            label,
            style: const TextStyle(fontSize: 12, fontWeight: FontWeight.w500),
          ),
        ],
      ),
    );
  }

  // Banner Dasbor Profesional
  Widget _buildProfessionalDashboard() {
    return Container(
      width: double.infinity,
      margin: const EdgeInsets.symmetric(horizontal: 16, vertical: 6),
      padding: const EdgeInsets.symmetric(horizontal: 12, vertical: 10),
      decoration: BoxDecoration(
        color: const Color(0xFFF3F4F8),
        borderRadius: BorderRadius.circular(8),
      ),
      child: Row(
        mainAxisAlignment: MainAxisAlignment.spaceBetween,
        children: [
          Column(
            crossAxisAlignment: CrossAxisAlignment.start,
            children: const [
              Text(
                'Dasbor profesional',
                style: TextStyle(fontWeight: FontWeight.bold, fontSize: 13),
              ),
              SizedBox(height: 2),
              Text(
                'Fitur baru kini tersedia.',
                style: TextStyle(color: Colors.grey, fontSize: 11),
              ),
            ],
          ),
          const Icon(Icons.circle, color: Colors.blue, size: 8),
        ],
      ),
    );
  }

  // Tombol Edit Profil, Bagikan Profil, Kontak
  Widget _buildEditProfileButtons() {
    return Padding(
      padding: const EdgeInsets.symmetric(horizontal: 16, vertical: 6),
      child: Row(
        children: [
          Expanded(child: _buildActionButton('Edit profil')),
          const SizedBox(width: 6),
          Expanded(child: _buildActionButton('Bagikan profil')),
          const SizedBox(width: 6),
          Expanded(child: _buildActionButton('Kontak')),
        ],
      ),
    );
  }

  Widget _buildActionButton(String label) {
    return Container(
      padding: const EdgeInsets.symmetric(vertical: 8),
      alignment: Alignment.center,
      decoration: BoxDecoration(
        color: const Color(0xFFEFF2F5),
        borderRadius: BorderRadius.circular(8),
      ),
      child: Text(
        label,
        style: const TextStyle(
          fontSize: 13,
          fontWeight: FontWeight.w600,
          color: Colors.black,
        ),
      ),
    );
  }

  // Sorotan Cerita (Story Highlights)
  Widget _buildStoryHighlights() {
    final highlights = [
      {'title': 'Baru', 'isAdd': true},
      {'title': '1%', 'isAdd': false, 'image': 'assets/highlight1.jpg'},
      {'title': '5%', 'isAdd': false, 'image': 'assets/highlight2.jpg'},
      {'title': '3%', 'isAdd': false, 'image': 'assets/highlight3.jpg'},
    ];

    return Container(
      height: 95,
      padding: const EdgeInsets.symmetric(vertical: 10),
      child: ListView.builder(
        scrollDirection: Axis.horizontal,
        padding: const EdgeInsets.symmetric(horizontal: 16),
        itemCount: highlights.length,
        itemBuilder: (context, index) {
          final item = highlights[index];
          final bool isAdd = item['isAdd'] as bool;

          return Padding(
            padding: const EdgeInsets.only(right: 16),
            child: Column(
              children: [
                Container(
                  width: 54,
                  height: 54,
                  decoration: BoxDecoration(
                    shape: BoxShape.circle,
                    border: Border.all(color: Colors.grey.shade300),
                    image: (!isAdd && item['image'] != null)
                        ? DecorationImage(
                            image: AssetImage(item['image'] as String),
                            fit: BoxFit.cover,
                          )
                        : null,
                  ),
                  child: isAdd
                      ? const Icon(Icons.add, size: 28, color: Colors.black)
                      : null,
                ),
                const SizedBox(height: 4),
                Text(
                  item['title'] as String,
                  style: const TextStyle(fontSize: 11),
                ),
              ],
            ),
          );
        },
      ),
    );
  }

  // Tab Menu Navigasi Postingan
  Widget _buildTabBar() {
    return Container(
      decoration: const BoxDecoration(
        border: Border(top: BorderSide(color: Color(0xFFE4E8ED), width: 0.8)),
      ),
      child: Row(
        children: [
          Expanded(
            child: Container(
              padding: const EdgeInsets.symmetric(vertical: 10),
              decoration: const BoxDecoration(
                border: Border(bottom: BorderSide(color: Colors.black, width: 1.5)),
              ),
              child: const Icon(Icons.grid_on, size: 22),
            ),
          ),
          const Expanded(
            child: Padding(
              padding: EdgeInsets.symmetric(vertical: 10),
              child: Icon(Icons.autorenew, size: 22, color: Colors.grey),
            ),
          ),
          const Expanded(
            child: Padding(
              padding: EdgeInsets.symmetric(vertical: 10),
              child: Icon(Icons.person_pin_outlined, size: 22, color: Colors.grey),
            ),
          ),
        ],
      ),
    );
  }

  // Tampilan Kosong "Buat postingan pertama Anda"
  Widget _buildEmptyPostSection() {
    return Padding(
      padding: const EdgeInsets.symmetric(horizontal: 32, vertical: 40),
      child: Column(
        children: [
          Icon(Icons.draw_outlined, size: 80, color: Colors.purple.shade300),
          const SizedBox(height: 16),
          const Text(
            'Buat postingan pertama Anda',
            textAlign: TextAlign.center,
            style: TextStyle(fontSize: 18, fontWeight: FontWeight.bold),
          ),
          const SizedBox(height: 8),
          const Text(
            'Buat ruang ini sesuai selera Anda.',
            textAlign: TextAlign.center,
            style: TextStyle(color: Colors.grey, fontSize: 13),
          ),
          const SizedBox(height: 20),
          ElevatedButton(
            onPressed: () {},
            style: ElevatedButton.styleFrom(
              backgroundColor: const Color(0xFF3897F0),
              elevation: 0,
              padding: const EdgeInsets.symmetric(horizontal: 24, vertical: 8),
              shape: RoundedRectangleBorder(
                borderRadius: BorderRadius.circular(8),
              ),
            ),
            child: const Text(
              'Buat',
              style: TextStyle(color: Colors.white, fontWeight: FontWeight.bold),
            ),
          ),
        ],
      ),
    );
  }
}