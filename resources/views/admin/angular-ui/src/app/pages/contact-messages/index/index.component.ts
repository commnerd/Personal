import { Component, OnInit } from '@angular/core';
import { Observable } from 'rxjs';
import { Paginated } from '@models/api/laravel/paginated';
import { ContactMessage } from '@models/api/contact-message';
import { ContactMessagesService } from '@services/api/contact-messages.service';

@Component({
  selector: 'app-index',
  templateUrl: './index.component.html',
  styleUrls: ['./index.component.scss']
})
export class IndexComponent implements OnInit {

  contactMessages$: Observable<Paginated<ContactMessage>> = this.contactMessagesService.list();

  constructor(
    private contactMessagesService: ContactMessagesService
  ) { }

  ngOnInit(): void {
  }

}
