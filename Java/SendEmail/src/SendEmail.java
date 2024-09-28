import java.io.File;
import java.io.IOException;
import java.util.Properties;

import javax.mail.Message;
import javax.mail.MessagingException;
import javax.mail.Session;
import javax.mail.Transport;
import javax.mail.internet.AddressException;
import javax.mail.internet.InternetAddress;
import javax.mail.internet.MimeBodyPart;
import javax.mail.internet.MimeMessage;
import javax.mail.internet.MimeMultipart;

public class SendEmail {
	Session newSession = null;
	private MimeMessage mimeMessage;

	public static void main(String[] args) throws AddressException,MessagingException,IOException   {
		SendEmail email = new SendEmail();
		email.setupServerProperties();
		email.draftEmail();
		email.sendEmail();
		
	}

	private void sendEmail() throws MessagingException {
		String fromUser = "freefiremadgamers@gmail.com";
		String fromUserPassword = "xons wopn ruig mfeg";
		String emailHost = "smtp.gmail.com";
		Transport trans = newSession.getTransport("smtp");
		trans.connect(emailHost,fromUser,fromUserPassword);
		trans.sendMessage(mimeMessage, mimeMessage.getAllRecipients());
		trans.close();
		System.out.print("Email Sented Successfully");
		
	}

	private MimeMessage draftEmail() throws AddressException,MessagingException,IOException  {
		String[] emailReceipients = {};
		String emailSubject = "";
		String emailBody = "www.leetcode.com/problemset";
		mimeMessage = new MimeMessage(newSession);
		for(int i=0;i<emailReceipients.length;i++) {
			mimeMessage.addRecipient(Message.RecipientType.TO,new InternetAddress(emailReceipients[i]));
		}
		mimeMessage.setSubject(emailSubject);
		
		MimeBodyPart bodyPart = new MimeBodyPart();
		bodyPart.setContent(emailBody,"text/html");
		MimeBodyPart attach = new MimeBodyPart();
		attach.attachFile(new File("C:\\Users\\User\\Downloads\\clock.png"));
		MimeMultipart multiPart = new MimeMultipart();
		multiPart.addBodyPart(bodyPart);
		multiPart.addBodyPart(attach);
		mimeMessage.setContent(multiPart);
		return mimeMessage;
	}

	private void setupServerProperties() {
		Properties prop = System.getProperties();
		prop.put("mail.smtp.port","587");
		prop.put("mail.smtp.auth","true");
		prop.put("mail.smtp.starttls.enable","true");
		newSession  =  Session.getDefaultInstance(prop,null);
		
	}
	
}
