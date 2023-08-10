import { Component, OnInit, Input } from '@angular/core';

@Component({
  selector: 'app-card',
  templateUrl: './card.component.html',
  styleUrls: ['./card.component.scss']
})
export class CardComponent implements OnInit {
  @Input() title ?: string;
  @Input() link !: Array<string>;
  @Input() description ?: string;
  @Input() background ?: string;
  style ?: string;
  
  ngOnInit(): void {
    if(this.background) {
      this.style = `background-image: url(/storage/admin/${this.background})`;
    }
  }

}
