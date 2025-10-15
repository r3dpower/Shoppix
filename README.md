# Shoppix - Intigriti October 2025 Challenge
⚠️ Warning: This repository intentionally contains insecure code and is provided only for educational, research, and defensive testing in isolated lab environments. Do not deploy this on production systems or any systems you do not own or have explicit permission to test.


## ⚙️Requirements
Only run this lab in an isolated, controlled environment (VM, container, or isolated network). Do not run on production or public-facing hosts.
- Linux system (Debian/Ubuntu/Kali recommended for examples)
- Docker

## 🧩 Learning Objectives

- Some hands-on experience with common web attacks
- Getting familiar with common mitigations such as PHP disabled functions and "access denied" paths

## 🚀 Setup Instructions

1. Clone this repository:

   ```bash
   git clone https://github.com/r3dpower/Shoppix.git
   cd Shoppix

2. Build and run the Docker image:

   ```bash
   sudo docker build -t shoppix_ctf .
   sudo docker run --rm -p 80:80 --name shoppix_ctf shoppix_ctf

3. In the browser go to http://127.0.0.1 and start the lab!

Happy hacking! 🐱‍💻
