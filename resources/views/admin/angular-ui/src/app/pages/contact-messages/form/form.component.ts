import { Component, Input } from '@angular/core';
import { FormBuilder, Validators } from '@angular/forms';
import { Router } from '@angular/router';
import { ContactMessage } from '@models/api/contact-message';
import { ContactMessagesService } from '@services/api/contact-messages.service';

@Component({
  selector: 'app-form',
  templateUrl: './form.component.html',
  styleUrls: ['./form.component.scss']
})
export class FormComponent {

  @Input() title: string = '';
  @Input() contactMessage: ContactMessage = { name: '', email_phone: '', message: '' };

  contactForm = this.fb.group({
    name: [null, Validators.required],
    email_phone: [null, Validators.required],
    message: [null, Validators.required ],
  });

  constructor(
    private fb: FormBuilder,
    private contactMessagesService: ContactMessagesService,
    private router: Router
  ) {}

  onSubmit(): void {
    if(this.contactForm.valid) {
      Object.assign(this.contactMessage, this.contactForm.value);
      let subscription = this.contactMessagesService.save(this.contactMessage).subscribe( contactMessage => {
        this.router.navigate(['']);
        subscription.unsubscribe();
      });
    }
  }
}
