import { BaseService } from './base.service';
import { ContactMessage } from '@models/api/contact-message';
import { HttpClient } from '@angular/common/http';
import { Injectable } from '@angular/core';


@Injectable({
  providedIn: 'root'
})
export class ContactMessagesService extends BaseService<ContactMessage> {
  protected override endpoint: string = '/api/contact-messages';
  constructor(protected override httpClient: HttpClient ) {
    super(httpClient);
  }
}
