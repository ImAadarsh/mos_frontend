// Script to handle any dynamic behavior if needed
document.addEventListener('DOMContentLoaded', () => {
    // Dynamic data injection (example)
    const urlParams = new URLSearchParams(window.location.search);
    
    if(urlParams.has('name')) {
        document.getElementById('recipientName').innerText = urlParams.get('name');
    }
    
    if(urlParams.has('date')) {
        const date = urlParams.get('date');
        document.getElementById('issueDate').innerText = date;
        document.getElementById('workshopDate').innerText = date;
    }

    // Generate QR Code with current page URL
    const currentUrl = window.location.href;
    new QRCode(document.getElementById("qrcode"), {
        text: currentUrl,
        width: 80,
        height: 80,
        colorDark: "#000000",
        colorLight: "#ffffff",
        correctLevel: QRCode.CorrectLevel.M
    });

    console.log("Certificate Loaded");
});

// PDF Download Function - Uses browser's Print to PDF (no CORS issues)
function downloadPDF() {
    // Browser's print dialog supports "Save as PDF" natively
    // This avoids all CORS/tainted canvas issues with local SVG files
    window.print();
}

// LinkedIn Share Function
function shareLinkedIn() {
    const url = encodeURIComponent(window.location.href);
    const text = encodeURIComponent('I have successfully completed the Magic of Skills workshop!');
    const linkedInUrl = `https://www.linkedin.com/sharing/share-offsite/?url=${url}&title=${text}`;
    window.open(linkedInUrl, '_blank', 'width=600,height=400');
}

// Twitter Share Function
function shareTwitter() {
    const url = encodeURIComponent(window.location.href);
    const text = encodeURIComponent('I have successfully completed the Magic of Skills workshop! 🎓 #MagicOfSkills #Certificate');
    const twitterUrl = `https://twitter.com/intent/tweet?url=${url}&text=${text}`;
    window.open(twitterUrl, '_blank', 'width=600,height=400');
}

// WhatsApp Share Function
function shareWhatsApp() {
    const url = encodeURIComponent(window.location.href);
    const text = encodeURIComponent('🎓 I have successfully completed the Magic of Skills workshop!\n\nCheck out my certificate: ' + window.location.href);
    const whatsappUrl = `https://wa.me/?text=${text}`;
    window.open(whatsappUrl, '_blank');
}

// WhatsApp Status Share Function
function shareWhatsAppStatus() {
    const url = encodeURIComponent(window.location.href);
    const text = encodeURIComponent('🎓 Completed Magic of Skills workshop! ' + window.location.href);
    
    // WhatsApp Status is text-only on web, so we use the same endpoint
    // On mobile, it will detect and allow status posting
    const whatsappUrl = `https://wa.me/?text=${text}`;
    
    // Provide instructions
    alert('📱 To share as WhatsApp Status:\n\n1. Click OK to open WhatsApp\n2. On mobile: Tap the Status tab\n3. Create a new text status\n4. Paste the copied link\n\nNote: Status sharing works best on WhatsApp mobile app.');
    
    window.open(whatsappUrl, '_blank');
}
