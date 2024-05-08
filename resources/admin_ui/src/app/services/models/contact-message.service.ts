import { Injectable } from '@angular/core';
import {LaravelModelService} from "@services/models/laravel_model.service";
import {HttpClient} from "@angular/common/http";
import {ContactMessage} from "@interfaces/contact-message";

@Injectable({
  providedIn: 'root'
})
export class ContactMessageService extends LaravelModelService<ContactMessage> {

  protected path = '/api/contact-messages';

  constructor(
    override httpClient: HttpClient
  ) {
    super(httpClient);
  }
}
