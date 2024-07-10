const data = {
    departments: ["Urology", "Cardiac Surgery", "Vascular Surgery", "Neurology", "Pediatrics"],
    doctors: [
        {
            name: "Dr. John Doe",
            department: "Urology",
            email: "johndo@gmail.com",
            phone: "123-456-7890",
            image: "images/docman.jpg"
        },
        {
            name: "Dr. Jane Smith",
            department: "Cardiac Surgery",
            email: "janesmith@gmail.com",
            phone: "123-456-7890",
            image: "images/docman.jpg",
        },
        {
            name: "Dr. Emily Johnson",
            department: "Vascular Surgery",
            email: "emilyjohnson@gmail.com",
            phone: "456-789-0123",
            image: "images/docman.jpg",
        },
        {
            name: "Dr. Michael Brown",
            department: "Neurology",
            email: "michaelbrown@gmail.com",
            phone: "321-654-0987",
            image: "images/docman.jpg",
        },
        {
            name: "Dr. Sarah Davis",
            department: "Pediatrics",
            email: "sarahdavis@gmail.com",
            phone: "654-321-0987",
            image: "images/docman.jpg",
        }
    ]
};

document.addEventListener("DOMContentLoaded", () => {
    const departments = document.getElementById("departments");
    const doctors = document.getElementById("doctors");
    const searchInput = document.getElementById("searchInput");
    const searchButton = document.getElementById("searchButton");
    let currentDepartment = '';

    data.departments.forEach(department => {
        const li = document.createElement("li");
        li.textContent = department;
        li.addEventListener("click", () => {
            currentDepartment = department;
            displayDoctors(data.doctors.filter(doctor => doctor.department === department));
            searchInput.value = "";
        });
        departments.appendChild(li);
    });

    searchButton.addEventListener("click", () => searchDoctors(searchInput.value));

    searchInput.addEventListener("keypress", (event) => {
        if (event.key === "Enter") {
            searchDoctors(searchInput.value);
        }
    });

    function displayDoctors(doctorsList) {
        doctors.innerHTML = "";
        doctorsList.forEach(doctor => {
            const card = document.createElement("div");
            card.className = "doctor-card";
            
            const img = document.createElement("img");
            img.className = "doctor-image";
            img.src = doctor.image;
            
            const info = document.createElement("div");
            info.className = "doctor-info";
            info.innerHTML = `<strong>${doctor.name}</strong><br>${doctor.department}<br>Email: ${doctor.email}<br>Phone: ${doctor.phone}`;
            
            const icons = document.createElement("div");
            icons.className = "contact-icons";
            const emailIcon = document.createElement("img");
            emailIcon.src = "https://img.icons8.com/material-outlined/24/000000/new-post.png";
            emailIcon.addEventListener("click", () => window.location.href = `https://mail.google.com/mail/?view=cm&fs=1&to=${doctor.email}`);
            const phoneIcon = document.createElement("img");
            phoneIcon.src = "https://img.icons8.com/material-outlined/24/000000/phone.png";
            phoneIcon.addEventListener("click", () => window.location.href = `tel:${doctor.phone}`);
            icons.appendChild(emailIcon);
            icons.appendChild(phoneIcon);
            
            card.appendChild(img);
            card.appendChild(info);
            card.appendChild(icons);
            doctors.appendChild(card);
        });
    }

    function searchDoctors(name) {
        const filteredDoctors = data.doctors.filter(doctor => {
            const matchesName = doctor.name.toLowerCase().includes(name.toLowerCase());
            const matchesDepartment = !currentDepartment || doctor.department === currentDepartment;
            return matchesName && matchesDepartment;
        });
        displayDoctors(filteredDoctors);
    }

    // Display all doctors by default
    displayDoctors(data.doctors);
});
