import Student from "./Models/Student.js";
import BankAccount from "./Models/BankAccount.js";
// import Person from "./Models/Person";

const mhs1 = new Student ("Budi", 21, "241110038", "Informatika");
mhs1.greet();
mhs1.Study();


const rekeningMhs = new BankAccount(mhs1.name);
rekeningMhs.deposit(200000);
rekeningMhs.withdraw(500000);

document.getElementById("output").innerHTML = `
<h2> Data Mahasiswa </h2>
<p><strong>Nama : </strong> ${mhs1.name}</p>
<p><strong>Umur : </strong> ${mhs1.age}</p>
<p><strong>Nim : </strong> ${mhs1.nim}</p>
<p><strong>jurusan : </strong> ${mhs1.major}</p>
<p> <strong> Saldo Akhir : </strong> 
Rp${rekeningMhs.getBalance().toLocaleString('id-ID')} </p>
`;