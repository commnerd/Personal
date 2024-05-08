import {Component, OnInit} from '@angular/core';
import {Observable} from "rxjs";
import {ActivatedRoute} from "@angular/router";
import {ContactMessage} from "@interfaces/contact-message";
import {ContactMessageService} from "@services/models/contact-message.service";

@Component({
  selector: 'app-show',
  templateUrl: './show.component.html',
  styleUrls: ['./show.component.scss']
})
export class ShowComponent implements OnInit {
  message$!: Observable<ContactMessage | null>;

  constructor(
    private contactMessageService: ContactMessageService,
    private route: ActivatedRoute,
  ) {}

  ngOnInit(): void {
    let paramSubscriber = this.route.params.subscribe(params => {
      this.message$ = this.contactMessageService.get(params['id'] as number);
      setTimeout(() => paramSubscriber.unsubscribe(), 0);
    });
  }
}
