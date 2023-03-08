import { Injectable } from '@angular/core';
import { BaseService } from './base.service';

import { ContactMessage } from '@models/api/contact-message';

@Injectable({
  providedIn: 'root'
})
export class ContactMessagesService extends BaseService<ContactMessage> {
  protected override endpoint: string = '/api/contact-messages';
  constructor() {
    super();
  }
}
